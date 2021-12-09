<template>
  <div class="step-final">
    <div class="step-form-fields card-inner">
      <button class="btn btn-primary" type="submit" :disabled="loading1 || loading2 || loading3">
        Баталгаажуулах хүсэлт илгээх
      </button>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        loading1: false,
        loading2: false,
        loading3: false,
      }
    },
    created() {
      this.$eventBus.$on('dz-loading-1', (data) => {
        this.loading1 = data;
      });

      this.$eventBus.$on('dz-loading-2', (data) => {
        this.loading2 = data;
      });

      this.$eventBus.$on('dz-loading-3', (data) => {
        this.loading3 = data;
      });
    }
  }
</script>
