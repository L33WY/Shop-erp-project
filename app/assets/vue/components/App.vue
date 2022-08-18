<template>
  <h1>Hello from Vue js ! Hello {{ name }}</h1>
  <h2 @click="onNameChange('name 1')">Dawid</h2>
  <h2 @click="onNameChange('name 2')">Tomek</h2>
</template>

<script>
export default {
  data() {
    return {
      name: 'name 1'
    }
  },

  methods: {
    onNameChange(name) {
      this.name = name;
    }
  }
}
</script>