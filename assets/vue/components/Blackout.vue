<template>
  <div class="blackout__root"></div>
</template>

<script>
export default {
  name: "Blackout"
}
</script>

<style scoped>
  .blackout__root {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(34, 34, 34, 0.48);
  }
</style>