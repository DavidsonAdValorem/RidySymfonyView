<template>
  <div class="mb-3">
  <label :for="id" class="form-label">{{ label }}</label>
  <textarea class="form-control" :id="id" rows="3" :name="name"></textarea>
</div>
</template>

<script>
export default {
    props: {
    name: String,
    label: String,
    id: String
  }
}
</script>

<style>

</style>