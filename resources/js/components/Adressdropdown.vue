<template>
    <div>
         <div class="form-group floate-left d-inline-block ml-3" style="width: 30%;">
            <label for="country_id">Select Country</label>
            <select name="country_id" id="country_id"  class="custom-select" v-model="country" @change="getState" >

                <option v-for="data in countries" :value="data.id" :key="data.id">{{data.name}}</option>

            </select>
            
        </div>
        <div class="form-group floate-left d-inline-block ml-3" style="width: 30%;">
            <label for="state_id">Select State</label>
            <select name="state_id" id="state_id" class="custom-select" v-model="state" @change="getCity" >
                
                <option v-for="data in states" :value="data.id" :key="data.id">{{data.name}}</option>
            </select>
        </div>

        <div class="form-group d-inline-block ml-3" style="width: 30%;">
            <label for="city_id">Select City</label>
            <select name="city_id" id="city_id" class="custom-select" v-model="city" >
                
                <option v-for="data in cities" :value="data.id" :key="data.id">{{data.name}}</option>


            </select>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return{
            country:0,
            countries:[],
            state:0,
            states:[],
            city:0,
            cities:[],

        }
    },

    mounted(){
        this.getCountry();
    },

    methods:{
        getCountry(){
            axios.get('/api/country').then((response)=>{
                this.countries=response.data;
            })
        },

        getState(){
            axios.get('/api/state',{params:{country_id:this.country}}).then((response)=>{
                this.states=response.data;
            })
        },

        getCity(){
            axios.get('/api/city',{params:{state_id:this.state}}).then((response)=>{
                this.cities=response.data;
            })
        },
    }
}
</script>