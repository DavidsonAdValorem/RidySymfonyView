<template>
     <div class="mb-3">
    <label :for="id" class="form-label">{{ label }}</label>
    <input :type="type" class="form-control" :id="id" :name="name">
    <div :id="id" class="form-text">{{ caption }}</div>
  </div>
</template>

<script>
export default {
    props: {
    type: String,
    label: String,
    caption: String,
    id: String
  }
}
</script>

<style>

</style>