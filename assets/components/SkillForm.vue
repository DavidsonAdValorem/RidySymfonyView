<template>
    <div class="col-md-6 mx-auto my-form">
        <div class="form-title">
            <h1 class="h1 my-5">{{formMode}} Skill</h1>
        </div>
        <div class="border border-2 rounded p-4">
            <form action="" @submit.prevent="handleSubmit">

                    <div class="mb-3">
                        <label :for="id" class="form-label">Name</label>
                        <input name="name" type="input" class="form-control" id="name" v-model="formData.name"/>
                        <div id="name" class="form-text">Enter your skill name</div>
                    </div>
    
                    <div class="mb-3">
                        <label for="img" class="form-label">Url Image</label>
                        <input name="img" type="input" class="form-control" id="img" v-model="formData.urlImg"/>
                        <div id="img" class="form-text">Enter the skill picture Url</div>
                    </div>
    
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input name="level" type="number" class="form-control" id="level" v-model="formData.level"/>
                        <div id="level" class="form-text">Enter the skill level</div>
                    </div>
    
                    <div class="mb-3">
                        <label for="level" class="form-label">Side</label>
                        <input name="side" type="text" class="form-control" id="side"  v-model="formData.side"/>
                        <div id="side" class="form-text">Enter the skill side</div>
                    </div>
    
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="type" name="type" v-model="formData.type">
                        <option v-for="val in selectValue" :key="val">{{val}}</option>
                    </select>
    
                    <div class="mb-3">
                        <label for="desc" class="form-label">Skill description</label>
                        <textarea class="form-control" id="desc" rows="3" name="desc" v-model="formData.description"></textarea>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto submit-button">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <span v-if="loading">
                                <span class="spinner-border text-light pb-1" role="status">
                                    <span class="sr-only"></span>
                                </span>
                            </span>
                            <span v-else>
                                {{formMode}} Skill 
                            </span>
                        </button>
                    </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { createSkill, editSkill } from '../utils';
    export default {
        props: {
            formData: Object,
        },
        data() {
            return {
                submitButton: "Add new ",
                loading: false,
                formData: this.$props.formData,
                selectValue: ["Programming Language", "Framework", "Others"]
            };
        },
        methods: {
            async createSkill () {
                this.loading = true
                const response = await createSkill(this.formData);
                this.formData = {}
                this.loading = false
            },
            async editSkill () {
                this.loading = true
                const response = await editSkill(this.formData.id, this.formData);
                this.loading = false
            },
            switchLoading(){
                this.loading = !this.loading
            },
            handleSubmit() {
                (this.formData.id) ? this.editSkill() :  this.createSkill()
            },
            verifyEdit(){
                console.log(this.formData)
                console.log(this.isEdited)
            },
            updateSkill(id) {
                axios.put(`/api/skill/update/${id}`)
                    .then((response) => {
                        this.skills = response.data;
                    })
                    .catch((error) => {
                        console.error('Error fetching data skills:', error);
                    });
               console.log('Click event prevented');
            }
        }, 
        computed: {
            formMode(){
                if(this.formData.id){
                    this.submitButton = "Edit "
                }
                return this.submitButton
            }
        }
    }
</script>

<style>
    .my-form {
        background-color: #fff;
    }
</style>