<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" :class="!active && 'active disabled'" href="" @click.prevent="changePage">Skills</a>
                    <a class="nav-link" :class="active && 'active disabled'" href="" @click.prevent="changePage">Create Skill</a>
                </div>
                </div>
            </div>
        </nav>
</template>

<script>
export default {
    props:{
        active: Boolean
    },
    methods: {
        changePage(){
            this.$emit('switchPageFromNav')
        }
    }
}
</script>

<style>

</style>