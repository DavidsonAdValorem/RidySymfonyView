<template>
    <div class="row d-flex">
        <h1 class="h1 my-5">All Skills</h1>
            <div  class="col-md-4 my-3" v-for="skill in skills" :key="skill.id">
                <Card @editSkill="handleEditSkill" @getSkills="getSkills" :skill="skill"/>
            </div>
        </div>
</template>

<script>
import { getSkills } from '../utils';
import Card from './Card.vue'
export default {
    components: {
        Card,
    },
    data() {
        return {
        skills: []
        };
    },
    methods: {
        async getSkills () {
            this.skills = await getSkills();
        }, 
        handleEditSkill(skill) {
                //remonte data to App
            this.$emit('editSkillMode', skill);
        }

    },

    beforeMount(){
        this.getSkills();
        console.log(this.skills)
    },

}
</script>

<style>

</style>