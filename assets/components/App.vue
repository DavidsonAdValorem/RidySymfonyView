<template>
    <div class="content">
        <HeaderNav :active="needForm" @switchPageFromNav="switchPage"/>
        <div class="container">
            <div v-if="alert != null">
                <Alert :alert="alert" @handleAlertMode="handleAlert"/>
            </div>
            <div class="my-5">
                <div v-if="viewSkill">
                    <ViewSkill :skill="skill" @viewSkillMode="handleViewSkill"/>
                </div>
                <div v-else>
                    <div v-if="needForm">
                        <SkillForm :formData="skill" @handleAlertMode="handleAlert"/>
                    </div>
                    <div v-else>
                        <CardRow  @viewSkillMode="handleViewSkill" @handleAlertMode="handleAlert" @editSkillMode="handleEditSkillFromCardRow"/>
                    </div>
                </div>
        </div>
    </div>
    </div>
</template>

<script>
import ViewSkill from './ViewSkill.vue'
import HeaderNav from './Header.vue'
import Alert from './Alert.vue'
import CardRow from './CardRow.vue'
import SkillForm from './SkillForm.vue'
export default {
    data() {
        return{
            needForm : false,
            skill: {},
            viewSkill: null,
            alert: null
        }
    },
    components: {
        CardRow,
        HeaderNav,
        Alert,
        SkillForm,
        ViewSkill
    },
    methods: {
        switchPage () {
            //navigator click
            this.needForm = !this.needForm;
            //reset skill default
            if (this.needForm == false) {
                this.setSkill({})
            }
        },
        handleEditSkillFromCardRow(skill) {
            //get data From cardrow
            this.setSkill(skill)
            this.switchPage()
        },
        handleViewSkill(data){
            this.setSkill(data)
            if(data.id) {
                this.viewSkill = true
            }else{
                this.viewSkill = null
            }
        },
        setSkill (data) {
            //change needForm
            this.skill = data
        },
        handleAlert(data){
            //get alert
            this.alert = data
        },

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