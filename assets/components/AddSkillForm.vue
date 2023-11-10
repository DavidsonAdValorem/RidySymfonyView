<template>
    <div class="col-md-6 mx-auto my-form">
        <div class="form-title">
            <p class="h2">Add new skills</p>
        </div>
        <div class="border border-2 rounded p-4">
            <form action="/api/CreateSkill" method="POST">
                <InputForm label="Name" type="input" id="name" name="name" caption="Enter the skills name" />
                <InputForm label="Url Image" type="input" id="img" name="img" caption="Enter the skill picture Url" />
                <InputForm label="Level" type="number" id="level" name="level" caption="Enter your skill level" />
                <InputForm label="Side" type="input" id="side" name="side" caption="Enter your skill level" />
                <Select name="type" />
                <TextArea label="Skill description" id="desc"  name="desc"/>
                <div class="d-grid gap-2 col-12 mx-auto submit-button">
                    <button type="submit" class="btn btn-primary btn-lg">Add skill</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import InputForm from './Input.vue'
    import TextArea from './TextArea.vue'
    import Select from './Select.vue'
    export default {
        components: {
            InputForm,
            Select,
            TextArea,
        }
    }
</script>

<style>
    .my-form {
        background-color: #fff;
    }

    .form-title {
        text-align: center;
        color: rgb(106, 67, 143);
    }
</style>