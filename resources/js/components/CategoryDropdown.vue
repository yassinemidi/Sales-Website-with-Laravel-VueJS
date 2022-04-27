<template>
    <div>
        

        <div class="form-group d-inline-block float-left ml-2" style="width: 30%;">
            <label for="category_id">Select Category</label>
            <select name="category_id" id="category_id" class="custom-select" v-model="category" @change="getSubcategories">
                
                <option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option>

            </select>
        </div>
        <div class="form-group d-inline-block float-left ml-2" style="width: 30%;">
            <label for="subcategory_id">Select Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="custom-select" v-model="subcategory" @change="getChildcategories">
                
                <option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option>
            </select>
        </div>
        <div class="form-group d-inline-block ml-2" style="width: 30%;">
            <label for="childcategory_id">Select Childcategory</label>
            <select name="childcategory_id" id="childcategory_id" class="custom-select" v-model="childcategory">
                
                <option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option>
            </select>
        </div>
    </div>

</template>

<script>
export default {
  data() {
      return {
          category:0,
          categories:[],
          subcategory:0,
          subcategories:[],
          childcategory:0,
          childcategories:[],
      }
  },
  mounted(){
      this.getCategories();
      
  },
  methods:{
      getCategories(){
          axios.get('/api/category')
          .then((response)=>{
              this.categories=response.data;
          })
          .bind(this);
          this.childcategories=[];
      },

      getSubcategories(){
          axios.get('/api/subcategory',{params:{category_id:this.category}})
          .then((response)=>{
              this.subcategories=response.data;
          })
          .bind(this);
          this.childcategories=[];
          
      },

      getChildcategories(){
          axios.get('/api/childcategory',{params:{subcategory_id:this.subcategory}})
          .then((response)=>{
              this.childcategories=response.data;
          })
          .bind(this)
      }
  }
};
</script>