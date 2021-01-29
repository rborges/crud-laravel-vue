<template>
  <div>
    <h3 class="text-center">Users</h3>
    <br />

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>E-mail</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.created_at }}</td>
          <td>{{ user.updated_at }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link :to="{ name: 'update', params: { id: user.id } }" class="btn btn-primary">Edit </router-link>
              <button class="btn btn-danger" @click="deleteUser(user.id)"> Delete </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      users: [],
    };
  },
  created() {
    this.axios.get("http://localhost/api/users").then((response) => {
      this.users = response.data;
    });
  },
  methods: {
    deleteUser(id) {
      this.axios
        .delete(`http://localhost/api/users/${id}`)
        .then((response) => {
          console.log(response);
          if(response.status == 200){
            alert('Removed');
            let i = this.users.map((item) => item.id).indexOf(id);
            this.users.splice(i, 1);
          }
          
        });
    },
  },
};
</script>