<template>
    <div class="card w-75 mx-auto">
        <div class="card-header">
          <h3>{{formType}} Company</h3>
        </div>
        <div class="card-body clearfix">
          <form @submit.prevent="submit">
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" type="text" id="name" name="name" v-model="fields.name">
              <div class="alert alert-danger" v-show="errors && errors.name">
                  {{ errors.name ? errors.name[0] : '' }}
              </div>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" rows="2" id="description" name="description" v-model="fields.description"></textarea>
              <div class="alert alert-danger" v-show="errors && errors.description">
                  {{ errors.description ? errors.description[0] : '' }}
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {},
            errors: {}
        }
    },
    props: [
        'formType',
        'name',
        'description',
        'id',

    ],
    mounted() {
        if (this.formType == 'Edit') {
            Vue.set(this.fields, 'name', this.name);
            Vue.set(this.fields, 'description', this.description)
        }
    },
    methods: {
        submit: async function() {
            let apiUrl = '/api/company';
            try {
                if (this.formType == 'Edit') {
                    apiUrl += '/' + this.id.toString();
                    axios.put('/api/company/'+this.id.toString(), this.fields);
                } else {
                    await axios.post(apiUrl, this.fields);
                }
                this.fields = {};
                window.location.href = '/';
            } catch (err) {
                if (err.response.status == 422) {
                    this.errors = err.response.data.errors;
                }
                console.log(err);
            }
        }
    }
}
</script>
