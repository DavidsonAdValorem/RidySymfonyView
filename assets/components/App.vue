<template>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" :class="!needForm && 'active disabled'" href="" @click.prevent="switchPage">Skills</a>
                    <a class="nav-link" :class="needForm && 'active disabled'" href="" @click.prevent="switchPage">Create Skill</a>
                </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="my-5">
            <div v-if="needForm">
                <SkillForm :formData="skill"/>
            </div>
            <div v-else>
                <CardRow  @editSkillMode="handleEditSkillFromCardRow"/>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import CardRow from './CardRow.vue'
import SkillForm from './SkillForm.vue'
export default {
    data() {
        return{
            needForm : false,
            skill: {}
        }
    },
    components: {
        CardRow,
        SkillForm
    },
    methods: {
        switchPage () {
            //navigator click
            this.needForm = !this.needForm;
            //reset skill default
            if (this.needForm == false) {
                this.editMode({})
            }
        },
        handleEditSkillFromCardRow(skill) {
            //get data From cardrow
            this.editMode(skill)
            this.switchPage()
        },
        editMode (data) {
            //change needForm
            this.skill = data
        }

    },
    beforeMount(){
    }
}
</script>

<style>
    h1{
        text-align: center;
    }
</style>