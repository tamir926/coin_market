<template>
  <ul class="document-list">
    <li class="document-item">
      <div style="position: relative;">
        <input type="radio" checked name="doc_type" id="docNidcard" class="document-type" value="nidcard" @change="onChange($event)">
        <label for="docNidcard">
          <div class="document-type-icon">
            <img src="https://ico.admc.mn/assets/images/icon-national-id.png" alt="">
            <img src="https://ico.admc.mn/assets/images/icon-national-id-color.png" alt="">
          </div>
          <span>Иргэний үнэмлэх</span>
        </label>
      </div>
    </li>
    <li class="document-item">
      <div style="position: relative;">
        <input type="radio" name="doc_type" id="docPassport" class="document-type" value="passport" @change="onChange($event)">
        <label for="docPassport">
          <div class="document-type-icon">
            <img src="https://ico.admc.mn/assets/images/icon-passport.png" alt="">
            <img src="https://ico.admc.mn/assets/images/icon-passport-color.png" alt="">
          </div>
          <span>Пасспорт</span>
        </label>
      </div>
    </li>
    <li class="document-item">
      <div style="position: relative;">
        <input type="radio" name="doc_type" id="docDocument" class="document-type" value="document" @change="onChange($event)">
        <label for="docDocument">
          <div class="document-type-icon">
            <img src="https://ico.admc.mn/assets/images/icon-passport.png" alt="">
            <img src="https://ico.admc.mn/assets/images/icon-passport-color.png" alt="">
          </div>
          <span>Түц машины лавлагаа</span>
        </label>
      </div>
    </li>
    <li class="document-item">
      <div style="position: relative;">
        <input type="radio" name="doc_type" id="docDriving" class="document-type" value="driving" @change="onChange($event)">
        <label for="docDriving">
          <div class="document-type-icon">
            <img src="https://ico.admc.mn/assets/images/icon-license.png" alt="">
            <img src="https://ico.admc.mn/assets/images/icon-license-color.png" alt="">
          </div>
          <span>Жолооны үнэмлэх</span>
        </label>
      </div>
    </li>
  </ul>
</template>

<script>
  export default {
    data() {
      return {
        // 
      }
    },
    mounted() {
      console.log('document list mounted!.');
    },
    methods: {
      onChange(event) {
        let data = event.target.value;
        this.$eventBus.$emit('change-doc', data);
      }
    }
  }
</script>

<style lang="scss" scoped>

  .document-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    padding-bottom: 20px;
  }

  .document-item {
    padding: 5px 10px;
    width: auto !important;
  }

  .document-type {
    position: absolute;
    opacity: 0;
    height: 1px;
    width: 1px;
  }

  .document-type ~ label {
    position: relative;
    display: block;
    border: 2px solid #e6effb;
    border-radius: 4px;
    color: #83898f;
    padding: 8px 42px 8px 14px;
    font-size: 11px;
    transition: all 0.4s;
    display: flex;
    align-items: center;
    cursor: pointer;
    margin-bottom: 0;
  }

  .document-type-icon {
    position: relative;
    width: 30px;
  }

  .document-type-icon img {
    min-width: 100%;
    transition: all 0.4s;
    max-width: 100%;
  }

  .document-type ~ label span {
    padding-left: 15px;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 0.05em;
    transition: all 0.4s;
  }

  .document-type:checked ~ label {
    border-color: #f15a29;

    span {
      color: #505258;
    }
  }

  .document-type:checked ~ label .document-type-icon img:last-child:not(:first-child) {
    opacity: 1;
  }

  .document-type-icon img:last-child:not(:first-child) {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
  }

  .document-type:checked ~ label:after {
    opacity: 1;
  }
  
</style>
