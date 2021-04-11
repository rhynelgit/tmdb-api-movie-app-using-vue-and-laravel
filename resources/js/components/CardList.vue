<template>
  <div class="card-wrapper wid-3">
    <div class="card">
      <span class="card-badge"
        >Vote Average: <strong>{{ movie.vote_average }}</strong></span
      >
      <img class="card-img" :src="cardImage(movie.poster_path)" />
      <h3 class="card-title">{{ movie.title }}</h3>
      <small class="card-date">Release Date: {{ movie.release_date }}</small>
    </div>
  </div>
</template>
<script>
export default {
  name: "CardList",
  props: ["movie"],
  methods: {
    cardImage(file) {
      return "https://image.tmdb.org/t/p/original/" + file;
    },
  },
};
</script>
