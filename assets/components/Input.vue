<template>
    <div class="mb-3">
        <label :for="id" class="form-label">{{ label }}</label>
        <input :name="name" :type="type" class="form-control" :id="id"/>
        <div :id="id" class="form-text">{{ caption }}</div>
    </div>
</template>

<script>
export default {
    props: {
    name: String,
    type: String,
    label: String,
    caption: String,
    id: String
  }
}
</script>

<style>

</style>