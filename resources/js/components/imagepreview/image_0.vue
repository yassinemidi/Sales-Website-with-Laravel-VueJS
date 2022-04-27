<template>
    
        
        <div>
        <input type="file" name="image_0" id="image_0" @change="onFileChange" />
        <div>
            <img v-if="url" :src="url" class="img-fluid " width="180" style="height: 200px;">
        </div>

        </div>
    
</template>

<script>
export default {
    data() {
        return{
            url:''
        }
    },

    methods:{
        onFileChange(e){
            const file=e.target.files[0];
            this.url=URL.createObjectURL(file);
        }
    }
}
</script>