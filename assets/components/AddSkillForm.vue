<template>
    <div class="col-md-6 mx-auto my-form">
        <div class="form-title">
            <p class="h2">Add new skills</p>
        </div>
        <div class="border border-2 rounded p-4">
            <form action="">
                <Input label="Name" type="input" id="name" caption="Enter the skills name" />
                <Input label="Url Image" type="input" id="ImgUrl" caption="Enter the skill picture Url" />
                <Input label="Level" type="number" id="level" caption="Enter your skill level" />
                <Select />
                <TextArea label="Skill description" id="level" />
                <div class="d-grid gap-2 col-12 mx-auto submit-button">
                    <button type="button" class="btn btn-primary btn-lg">Add skill</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Input from './Input.vue'
    import TextArea from './TextArea.vue'
    import Select from './Select.vue'
    export default {
        components: {
            Input,
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