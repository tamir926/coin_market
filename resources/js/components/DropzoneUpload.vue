<template>
  <div class="doc-uploads">
    <div class="doc-upload doc-upload1">
      <h6 class="doc-type-title">
        <span v-if="currentDoc == 'nidcard'">Өөрийн Иргэний үнэмлэх -ний хуулбарыг илгээнэ үү</span>
        <span v-if="currentDoc == 'passport'">Өөрийн Пасспорт -ний хуулбарыг илгээнэ үү</span>
        <span v-if="currentDoc == 'document'">Өөрийн ТҮЦ машины лавлагаа -ний хуулбарыг илгээнэ үү</span>
        <span v-if="currentDoc == 'driving'">Өөрийн Жолооны үнэмлэх -ний хуулбарыг илгээнэ үү</span>
      </h6>
      <div class="row align-items-center">
        <div class="col-sm-8">
          <div class="upload-zone document_one dz-clickable">
            <div class="dz-message" data-dz-message="">
              <span class="dz-message-text">Файлаа оруулна уу</span>
              <span class="dz-message-or"></span><br>
              <button type="button" class="btn btn-primary dz-btn" v-if="">Сонгох</button>
            </div>
            <div class="spinner-border text-muted" v-if="dz1Loading"></div>
          </div>
          <input type="hidden" name="doc_one">
        </div>
        <div class="col-sm-4 d-none d-sm-block">
          <div class="mx-md-4">
            <img width="160" class="_image" src="https://ico.admc.mn/assets/images/vector-nidcard.png" alt="" v-if="currentDoc == 'nidcard'">
            <img width="160" class="_image" src="https://ico.admc.mn/assets/images/vector-passport.png" alt="" v-if="currentDoc == 'passport'">
            <img width="160" class="_image" src="https://ico.admc.mn/assets/images/vector-nidcard.png" alt="" v-if="currentDoc == 'document'">
            <img width="160" class="_image" src="https://ico.admc.mn/assets/images/vector-driving.png" alt="" v-if="currentDoc == 'driving'">
          </div>
        </div>
      </div>
    </div>
    <div class="sap sap-gap" v-if="currentDoc == 'nidcard'"></div>
    <div class="doc-upload doc-upload2" :class="{ hide: isHideDocUpload2 }">
      <h6 class="doc-type-title">
        Иргэний үнэмлэхний ар талын зургийг илгээнэ үү
      </h6>
      <div class="row align-items-center">
        <div class="col-sm-8">
          <div class="upload-zone document_two dz-clickable">
            <div class="dz-message" data-dz-message="">
              <span class="dz-message-text">Файлаа оруулна уу</span>
              <span class="dz-message-or"></span><br>
              <button type="button" class="btn btn-primary dz-btn">Сонгох</button>
            </div>
            <div class="spinner-border text-muted" v-if="dz2Loading"></div>
          </div>
          <input type="hidden" name="doc_two">
        </div>
        <div class="col-sm-4 d-none d-sm-block">
          <div class="mx-md-4">
            <img width="160" class="_image" src="https://ico.admc.mn/assets/images/vector-id-back.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="sap sap-gap"></div>
    <div class="doc-upload doc-upload3">
      <h6 class="doc-type-title">
        Баримт бичгээ гартаа барьсан сельфи зураг илгээнэ үү
      </h6>
      <div class="row align-items-center">
        <div class="col-sm-8">
          <div class="upload-zone document_three dz-clickable">
            <div class="dz-message" data-dz-message="">
              <span class="dz-message-text">Файлаа оруулна уу</span>
              <span class="dz-message-or"></span><br>
              <button type="button" class="btn btn-primary dz-btn">Сонгох</button>
            </div>
            <div class="spinner-border text-muted" v-if="dz3Loading"></div>
          </div>
          <input type="hidden" name="doc_three">
        </div>
        <div class="col-sm-4 d-none d-sm-block">
          <div class="mx-md-4">
            <img width="160" class="_image" src="https://ico.admc.mn/assets/images/vector-hand.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

export default {
  data() {
    return {
      isHideDocUpload2: false,
      currentDoc: "nidcard",
      dz1Loading: false,
      dz2Loading: false,
      dz3Loading: false,
    }
  },
  created() {
    this.$eventBus.$on('change-doc', (data) => {
      this.currentDoc = data;
      this.isHideDocUpload2 = data == "nidcard" ? false : true;
      console.log('event data: ' + data);
    });
  },
  mounted() {
    let token = $('meta[name="csrf-token"]').attr('content');

    let dropzone1 = new Dropzone(".document_one", {
      url: "/user/kyc/upload",
      uploadMultiple: false,
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      headers: {
        'x-csrf-token': token,
      },
      accept: (file, done) => {
        if (dropzone1.files.length > 1) {
          dropzone1.removeFile(dropzone1.files[1]);
          done("error");
        }
        else {
          this.$eventBus.$emit('dz-loading-1', true);
          done();
        }
      },
      success: (file, response) => {
        this.dz1Loading = false;
        this.$eventBus.$emit('dz-loading-1', false);
        file.id = response;
        $('input[name="doc_one"]').val(response);
      },
      error: (res) => {
        this.dz1Loading = false;
        this.$eventBus.$emit('dz-loading-1', false);
        alert("Файлаа устгаад дахин оруулна уу");
      }
    });

    dropzone1.on("addedfile", file => {
      this.dz1Loading = true;

      let removeButton = Dropzone.createElement("<button type='button' class='btn btn-danger btn-sm'>Устгах</button>");
      file.previewElement.appendChild(removeButton);

      removeButton.addEventListener("click", function (e) {
        if (window.confirm('Файл устгах уу?')) {
          if (file.id) {
            axios.post("/user/kyc/upload-delete", {file_id: file.id});
          }
          dropzone1.removeFile(file);
        }
      });
    });

    let dropzone2 = new Dropzone(".document_two", {
      url: "/user/kyc/upload",
      uploadMultiple: false,
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      headers: {
        'x-csrf-token': token,
      },
      accept: (file, done) => {
        if (dropzone2.files.length > 1) {
          dropzone2.removeFile(dropzone2.files[1]);
          done("error");
        }
        else {
          this.$eventBus.$emit('dz-loading-2', true);
          done();
        }
      },
      success: (file, response) => {
        this.dz2Loading = false;
        this.$eventBus.$emit('dz-loading-2', false);
        file.id = response;
        $('input[name="doc_two"]').val(response);
      },
      error: (res) => {
        this.dz2Loading = false;
        this.$eventBus.$emit('dz-loading-2', false);
        alert("Файлаа устгаад дахин оруулна уу");
      }
    });

    dropzone2.on("addedfile", file => {
      this.dz2Loading = true;

      let removeButton = Dropzone.createElement("<button type='button' class='btn btn-danger btn-sm'>Устгах</button>");
      file.previewElement.appendChild(removeButton);

      removeButton.addEventListener("click", function (e) {
        if (window.confirm('Файл устгах уу?')) {
          if (file.id) {
            axios.post("/user/kyc/upload-delete", {file_id: file.id});
          }
          dropzone2.removeFile(file);
        }
      });
    });

    let dropzone3 = new Dropzone(".document_three", {
      url: "/user/kyc/upload",
      uploadMultiple: false,
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      headers: {
        'x-csrf-token': token,
      },
      accept: (file, done) => {
        if (dropzone3.files.length > 1) {
          dropzone3.removeFile(dropzone3.files[1]);
          done("error");
        }
        else {
          this.$eventBus.$emit('dz-loading-3', true);
          done();
        }
      },
      success: (file, response) => {
        this.dz3Loading = false;
        this.$eventBus.$emit('dz-loading-3', false);
        file.id = response;
        $('input[name="doc_three"]').val(response);
      },
      error: (res) => {
        this.dz3Loading = false;
        this.$eventBus.$emit('dz-loading-3', false);
        alert("Файлаа устгаад дахин оруулна уу");
      }
    });

    dropzone3.on("addedfile", file => {
      this.dz3Loading = true;

      let removeButton = Dropzone.createElement("<button type='button' class='btn btn-danger btn-sm'>Устгах</button>");
      file.previewElement.appendChild(removeButton);

      removeButton.addEventListener("click", function (e) {
        if (window.confirm('Файл устгах уу?')) {
          if (file.id) {
            axios.post("/user/kyc/upload-delete", {file_id: file.id});
          }
          dropzone3.removeFile(file);
        }
      });
    });
  }
}
</script>

<style lang="scss">
  .dz-success-mark, .dz-error-mark {
    display: none;
  }

  .doc-upload2.hide {
    display: none;
  }
</style>
