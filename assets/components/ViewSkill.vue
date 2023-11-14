<template>
    <div class="col-md-12 mx-auto">
        <div class="border border-1 rounded p-4 bg-light my-view">
        <div class="row">
            <div class="col-md-6">
                <img :src="skill.urlImg" alt="">
            </div>
            <div class="col-md-6">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close" @click="handleViewSkill" :class="(progress < skill.level) && 'disabled'"></button>
                <h3 class="h3 my-5">Skill: {{ skill.name }}</h3>
                <div>
                    <ul>
                        <li class="my-2"><span  class="label-list text-secondary">Side:</span> <span>{{ skill.side }}</span></li>
                        <li  class="my-2"><span  class="label-list text-secondary">Type:</span> <span>{{ skill.type }}</span></li>
                        <li class="my-2">
                            <span  class="label-list text-secondary">Level:</span> 
                            <div class="progress me-5 my-3">
                                <div class="progress-container">
                                    <div class="progress-bar" ref="progressBar">
                                        <span class="progress-text">{{ progress }}% Complete</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="my-2 me-4"><span  class="label-list text-secondary">Description:</span> <span class="text-dark">{{ skill.description }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        skill: Object
    },
    data() {
        return {
            progress: 0,
            intervalId: null,
        };
    },
    methods: {
        updateProgressBar() {
            this.intervalId = setInterval(() => {
                this.progress += 1;
                this.$refs.progressBar.style.width = `${this.progress}%`;
                this.$refs.progressBar.setAttribute('aria-valuenow', this.progress);
                if (this.progress >= this.$props.skill.level || !this.$props.skill.level) {
                    clearInterval(this.intervalId);
                }
            }, 15);
        },
        handleViewSkill() {
            //remonte data to App
            this.$emit('viewSkillMode', {});
        }
    },
    beforeMount () {
        this.updateProgressBar();
    }
}


</script>

<style>
    .my-view {
        border-color: #e9ecef !important;
    }
    img{
        width: 550px;
        height: 600px;
        overflow: hidden;
    }
    li{
        list-style: none;
    }
    .label-list{
        font-weight: bold;
        text-decoration: underline;
    }
    .progress-container {
        width:100%;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .progress-bar {
        background-color: #60f043;
        height: 2rem;
        width: 0;
    }

    .progress-text {
        font-weight: bold;
    }
</style>