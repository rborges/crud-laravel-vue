<template>
  <div id="content">
    <h3 class="text-center">Create User</h3>
    <div class="row">
      <div class="col-12">
        <form @submit.prevent="create">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="user.name" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" v-model="user.email" />
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
  methods: {
    create() {
      let url = "http://localhost/api/users";
      this.axios
        .post(url , this.user)
        .then(
          (response) => this.$router.push({ name: "home" })
        )
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
};
</script>