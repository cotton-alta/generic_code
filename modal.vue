<template>
  <div class="modal-wrapper">
    <div 
      :class="{ 'modal-main': isOpen }"
      :style="modalStyle"
      @click="modalClose"
    >
      <img
        :class="{ 
          'modal-image--open': isOpen,
          'modal-image--close': !isOpen
        }"
        :src="src"
      />
    </div>
    <!-- /.modal-main -->
    <div
      :class="{ 'modal-back': isOpen }"
      :style="backStyle"
      @click="modalClose"
    >
    </div>
    <!-- /.modal-back -->
    <div
      class="modal-content"
      @click="modalOpen"
      :style="`background-image: url(${src})`"
    >
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-wrapper -->
</template>

<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
  props: ["src"],
  data() {
    let modalStyle = {
      width: 0 + "px",
      height: 0 + "px",
      left: 0 + "px",
      top: 0 + "px"
    }
    let backStyle = {
      width: 0 + "px",
      height: 0 + "px"
    }
    return {
      isOpen: false,
      modalStyle,
      backStyle
    }
  },
  methods: {
    modalOpen: function() {
      let width = document.body.clientWidth;
      let height = window.innerHeight;
      let img_width = width * 0.9;
      let img_height = width * 0.9 * 0.5625;
      if(width > 1000) {
        img_width = 1000
        img_height = 1000 * 0.9 * 0.5625
      }
      this.isOpen = true;
      this.modalStyle = {
        width: img_width + "px",
        height: img_height + "px",
        left: ((width - img_width) / 2) + "px",
        top: ((height - img_height) / 2) + "px"
      }
      this.backStyle = {
        width: width + "px",
        height: height + "px"
      }
    },
    modalClose: function() {
      this.isOpen = false
      this.modalStyle = {
        width: 0 + "px",
        height: 0 + "px",
        left: 0 + "px",
        top: 0 + "px"
      }
      this.backStyle = {
        width: 0 + "px",
        height: 0 + "px"
      }
    }
  }
})
</script>

<style>
/* 
全体のwidthは親要素に任せる.
heightはモーダルの内容に対して変化するので指定しない.
*/
.modal-wrapper {
  width: 100%;
}

/* モーダル非表示にも表示する要素*/
.modal-content {
  width: 100%;
  padding-top: 56.25%;
  background-position: center center;
  background-size: cover;
  border-radius: 5px;
  cursor: pointer;
}

/* モーダル本体、画像とか */
.modal-main {
  opacity: 1;
  margin: 0;
  padding: 0;
  position: fixed;
  z-index: 999;
  cursor: pointer;
}

.modal-image--open {
  border-radius: 5px;
  width: 100%;
  animation: show .3s linear 0s;
}

.modal-image--close {
  display: none;
}

.modal-back {
  opacity: 0.5;
  background: #000000;
  position: fixed;
  top: 0;
  left: 0;
}

@keyframes show{
  from{ opacity: 0; }
  to{ opacity: 1; }
}
</style>