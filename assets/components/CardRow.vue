<template>
    <div class="row d-flex">
        <h1 class="h1 my-5">All Skills</h1>
            <div  class="col-md-4 my-3" v-for="skill in skills" :key="skill.id">
                <Card @editSkill="handleEditSkill" @alert="handleAlert" @viewSkill="handleViewSkill" @getSkills="getSkills" :skill="skill"/>
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
            const response = await getSkills();
            this.skills = response.reverse()
        }, 
        handleEditSkill(skill) {
            //remonte data to App
            this.$emit('editSkillMode', skill);
        }, 
        handleViewSkill(data) {
            //remonte data to App
            this.$emit('viewSkillMode', data);
        }, 
        handleAlert(data) {
            //remonte data to App
            this.$emit('handleAlertMode', data);
        }

    },

    beforeMount(){
        this.getSkills();
    },

}
</script>

<style>

</style>