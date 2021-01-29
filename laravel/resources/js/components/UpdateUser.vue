<template>
  <div>
    <h3 class="text-center">Edit user</h3>
    <div class="row">
      <div class="col-12">
        <form @submit.prevent="updateUser">
          <input type="hidden" class="form-control" v-model="user.id" />
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="user.name" />
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="text" class="form-control" v-model="user.email" />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" v-model="user.password" />
          </div>
          <button type="submit" class="btn btn-primary float-right">save</button>
        </form>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      user: {},
    };
  },
  created() {
    let url = `http://localhost/api/users/${this.$route.params.id}`;

    this.axios
      .get(url)
      .then((response) => {
        this.user = response.data;
      });
  },
  methods: {
    updateUser() {
      let url = 'http://localhost/api/users';
      this.axios
        .patch(url, this.user)
        .then((response) => {
          if(response.status == 200){
            alert('Updated');
            this.$router.push({ name: "home" });
          }
        });
    },
  },
};
</script>