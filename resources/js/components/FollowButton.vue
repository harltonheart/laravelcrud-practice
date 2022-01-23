<template>
  <div>
    <button
      class="btn btn-outline-primary btn-sm"
      @click="followUser"
      v-text="buttontext"
    >
      <!-- <i class="fa fa-plus" aria-hidden="true"></i> -->
    </button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],

  mounted() {
    console.log("Component mounted.");
  },

  data: function () {
    return {
      status: this.follows,
    };
  },

  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;
          console.log(response.data);
        })
        .catch((errors) => {
          if (errors.response.status == 500) {
            window.location = "/login";
          }
        });
    },
  },

  computed: {
    buttontext() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
