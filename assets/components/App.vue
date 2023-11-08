<template>
    <div class="content">
        <div class="container">
            <CardRow/>
            <Form/>
        </div>
    </div>
</template>

<script>
import Form from './AddSkillForm.vue'
import CardRow from './CardRow.vue'
export default {
    data() {
        return{
        }
    },
    components: {
        CardRow,
        Form
    }
}
</script>

<style>

</style>