<template>
    <div class="row d-flex">
            <div  class="col-md-4 my-5" v-for="skill in skills" :key="skill.id">
                <Card :name="skill.name" :desc="skill.description" :url="skill.urlImg"/>
            </div>
        </div>
</template>

<script>
import Card from './Card.vue'
import axios from 'axios';
export default {
    components: {
        Card
    },
    data() {
        return {
        skills: []
        };
    },
    methods: {
        getSkills () {
            axios.get("/api/getSkills")
            .then((response) => {
                this.skills = response.data;
                console.log(response.data[0])
            })
            .catch((error) => {
                console.error('Error fetching data skills:', error);
            });
        }
    },

    beforeMount(){
        this.getSkills();
    }

}
</script>

<style>

</style>