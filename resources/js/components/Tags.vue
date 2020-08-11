<template>
  <div class="modal fade" id="tagsModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="modalLabel">{{ name }}</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body categories">
            <form @submit.prevent="updateTags(id)">
                <div class="form-group category" v-for="(category, name, index) in categories" :key="index">
                <hr v-if="index != 0">
                <h5>{{ category[index].category }}</h5>
                <div class="d-flex flex-row justify-content-center">
                    <div class="tag" :class="[tagOpacities[tag.id], tag.category]"  v-on:click="handleClick(tag.id)" v-for="tag in category" :key="tag.text">
                        {{tag.text}}
                    </div>
                </div>
                </div>
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
            categories: [],
            company_tag_ids: [],
            tagOpacities: {}
        };
    },
    props: [
        'id',
        'name',
        'companyTags'
    ],
    mounted() {
        this.loadTags();
    },
    watch: {
        id: function() {
            this.company_tag_ids.push(...this.companyTags.map(tag => tag.id));
            for (let id of this.company_tag_ids) {
                Vue.set(this.tagOpacities, id, 'solid');
            }
        }
    },
    methods: {
        loadTags: function() {
            axios.get('/api/tag')
            .then(response => {
                this.categories = response.data;
            })
            .catch(err => {
                console.log(err);
            });
        },
        handleClick: function(id) {
            if (this.company_tag_ids.includes(id)) {

                let idx = this.company_tag_ids.indexOf(id);
                this.company_tag_ids.splice(idx, 1);
                this.tagOpacities[id] = '';
            } else {
                // Check does this category already have another tag
                let otherTag;
                for (let key in this.categories) {
                    if (this.categories[key].map(tag => tag.id).includes(id)) { // This tag is in this category
                        otherTag = this.categories[key].map(tag => tag.id).filter(tagId => this.company_tag_ids.includes(tagId));
                    }
                }
                if (otherTag[0]) { // There is another tag. Remove it.
                    let idx = this.company_tag_ids.indexOf(otherTag[0]);
                    this.company_tag_ids.splice(idx, 1);
                    this.tagOpacities[otherTag[0]] = '';
                }
                this.company_tag_ids.push(id);
                Vue.set(this.tagOpacities, id, 'solid');
            }
        },
        updateTags(id) {
            axios.post(`/api/${id}/tags`, {tags: this.company_tag_ids})
            .then(response => {
                this.company_tag_ids = [];
                window.location.reload();
            })
            .catch(err => console.log(err));
        }
    }
}
</script>
