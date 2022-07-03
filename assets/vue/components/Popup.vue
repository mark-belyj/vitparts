<template>
  <div class="popup__root">
    <h2 class="popup__title">Добавить запчасть</h2>
    <label for="">Фирма</label>
    <input type="text">
    <label for="">Артикул</label>
    <input type="text">
    <button class="input__btn">добавить</button>
    <Cross
        class="popup__close"
        @click.native="showClosePopup"
    />
  </div>
  <Blackout @click.native="showClosePopup"/>
</template>

<script>
import Blackout from "./Blackout";
import Cross from "./Cross";
import { useStore } from "vuex";
export default {
  name: "Popup",
  components: {Cross, Blackout},
  setup() {
    const store = useStore();
    const showClosePopup = () => {
      store.dispatch('showClosePopup', 'isActiveAddDetail');
    }

    return {
      showClosePopup
    }

  }
}
</script>

<style scoped>
  .popup__root {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 360px;
    background: white;
    padding: 20px;
    z-index: 2;
  }

  .popup__title {
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(34, 34, 34, 0.5);
  }

  .input__btn {
    width: 100%;
    border: none;
    outline: none;
    background: salmon;
    cursor: pointer;
    height: 30px;
    text-transform: uppercase;
  }

  .popup__close {
    position: absolute;
    top: 20px;
    right: 20px;
  }

</style>