<template>
    <div>
        <button v-if="showNumber" class="btn btn-success"><i class="fas fa-phone"></i> {{phoneNumber}}</button>
        <button v-else class="btn btn-success" v-on:click="Show"><i class="fas fa-phone"></i> Show Number</button>
    </div>
</template>

<script>
export default {
     props:[
             'phoneNumber'
        
        ],
    data(){
        return{
            showNumber:false,
           

        }
    },
    methods:{
        Show(){
            this.showNumber=true;
        }
    }
    
}
</script>