<template>
    <div class="companies">
      <div class="card" v-for="company in companies" :key="company.id">
        <div class="card-body clearfix">
          <div class="d-flex flex-row bd-highlight mb-3 justify-content-between">
            <div>
              <h3>{{ company.name }}</h3>
              <p>{{ company.description}}</p>
            </div>
            <!-- <ul class="d-inline-flex flex-column categories" v-for="category in tags[company.id]" :key="category"> -->
            <ul class="d-inline-flex flex-column categories">
              <li class="category" v-for="tag in tags[company.id]" :key="tag.id">
                <div class="tag" :class="tag.category">{{tag.text}}</div>
              </li>
            </ul>
          </div>
          <a role="button" class="btn btn-primary" :href="editString(company.id)">Edit</a>
          <a role="button" class="btn btn-secondary" :href="deleteString(company.id)">Delete</a>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tagsModal" v-on:click="populateModal(company.id)">Add Tags</button>
        </div>
      </div>
      <tags :id="modalCompanyId" :name="modalCompanyName" :companyTags="modalCompanyTags"></tags>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
            companies: [],
            tags: {},
            modalCompanyName: '',
            modalCompanyId: '',
            modalCompanyTags: []
        }
    },
    created() {
        this.loadCompanies();
    },
    methods: {
        loadCompanies: async function() {
            let response = await axios.get('/api/company');
            this.companies = response.data;
            let responseTwo = await axios.get('/api/company_tags');
            this.tags = responseTwo.data;
        },
        editString: function(id) {
            let str = '/company/' + id + '/edit';
            return str;
        },
        deleteString: function(id) {
            return '/api/company/destroy/' + id.toString();
        },
        populateModal: function(id) {
            let idx = this.companies.map(company => company.id).indexOf(id);
            this.modalCompanyName = this.companies[idx].name;
            this.modalCompanyId = id;
            this.modalCompanyTags.push(...this.tags[id]);
        }
    }
}
</script>
