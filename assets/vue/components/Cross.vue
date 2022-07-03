<template>
  <div class="cross__root"></div>
</template>

<script>
export default {
  name: "Cross"
}
</script>

<style scoped>
  .cross__root {
    cursor: pointer;
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOBAMAAADtZjDiAAAAElBMVEUAAAAJGCALGCIMGCINGCILGCAcnjtoAAAABnRSTlMAEG9/YF+sh3/pAAAAQElEQVQI12MQEWBgYGB0ZHBWBNJCpgxCRgIMjMqKIAxmAwlBIJMBKKAE4gIFjIFcKA0Xh6mD6YOZAzdXFGxPIACnpgempKQV6QAAAABJRU5ErkJggg==');
    background-position: center;
    background-repeat: no-repeat;
    background-size: 14px 14px;
    width: 14px;
    height: 14px;
    transition: .3s;
    padding: 10px;
  }

  .cross__root:hover {
    opacity: .7;
  }
</style>