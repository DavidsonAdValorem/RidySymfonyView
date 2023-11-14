<template>
    <div>
        <div class="card">
            <div class="img-card">

                <img :src="skill.urlImg" />
            </div>
            <div class="card-content">
                <h4 class="card-title h2">{{skill.name}}</h4>
                <p class="">{{ reduiceDesc }} </p>
            </div>
            <div class="card-read-more">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <button class="btn btn-primary"> Read More</button>
                    </div>
                    <div class="button-menu col-md-6 text-end">
                        <button class="btn btn-danger" @click="deleteSkill(skill.id)">
                            delete
                        </button>
                        <button class="btn btn-info" @click="emitEditSkill">
                            edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { deleteSkill, getSkills } from '../utils';
    export default {
        props: {
            skill: Object,
        },
        data() {
            return {
                card: this.$props.skill,
            }
        },

        methods: {
            deleteSkill(id) {
                deleteSkill(id).then(() => {
                    this.$emit('getSkills')
                })
            },

            emitEditSkill() {
                const skill = this.skill
                this.$emit('editSkill', skill);
                console.log("emitEditSkill", skill)
            }
        },


        computed: {
            reduiceDesc() {
                if (this.skill.description.length > 250) {
                    return this.skill.description.substring(0, 250) + "...";
                } else {
                    return this.skill.description
                }
            }
        }
    }
</script>

<style>
    h4.card-title {
        margin: 0 0 0.5em;
        color: #505050;
    }

    .card {
        display: block;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #ffffffb4;
        border-radius: 2px;
        text-align: center;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        transition: box-shadow .25s;
    }

    .card:hover {
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .img-card {
        width: 100%;
        height: 200px;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
        display: block;
        overflow: hidden;
    }

    .img-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: all .25s ease;
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .card-title {
        margin-top: 0px;
        font-weight: 700;
        font-size: 1.65em;
    }

    .card-title p {
        color: #000;
        text-decoration: none !important;
    }

    .card-read-more {
        color: rgb(0, 140, 255);
        border-top: 1px solid #D4D4D4;
        text-decoration: none !important;
        padding: 10px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .card-read-more button {
        margin-left: 5px;
    }
</style>