<template>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" :id="id" :name="name">
    <option selected>Open this select menu for {{ label }}</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select>
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