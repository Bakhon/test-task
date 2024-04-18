<template>
    <form @submit.prevent="submitForm" class="container">
        <div class="mb-3 mt-3">
        <label for="name" class="form-label"><h2>Форма обратной связи</h2></label>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Имя:</label>
        <input type="text" id="name" v-model="formData.name" class="form-control">
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Телефон:</label>
        <input type="text" id="phone" v-model="formData.phone" class="form-control">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Обращение:</label>
        <textarea id="message" v-model="formData.message" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        name: '',
        phone: '',
        message: ''
      },
      errors: {}
    };
  },
  methods: {
    submitForm() {
   

      fetch('/api/feedback', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(this.formData)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        this.formData = {
          name: '',
          phone: '',
          message: ''
        };
       // alert('Feedback submitted successfully');
      })
      .catch(error => {
        console.log('err', error)
        if (error.response.status === 400) {
        alert('Error: ' + error.response.data.error);
    }
        console.error('There was an error submitting feedback:', error);
      });
    }
  }
};
</script>
