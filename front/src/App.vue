<template>
  <section>
    <header>
      <h1>My books</h1>
    </header>
    <book-form @add-book="addNewBook"></book-form>
    
    <ul>
      <book-card v-for="book of books" 
      :key="book.id" 
      :book="book" @delete-book="deleteBook"></book-card>
     
    </ul>
  </section>
</template>

<script>
import axios from 'axios';

const API_URL ="http://localhost:8000/api"
export default {
  data() {
    return {
      books : [
        
      ]
    };
  },
  methods: {
    deleteBook(bookId){
      axios.delete(API_URL + "/books/" + bookId).then(() => {
  
      this.books = this.books.filter((book) => book.id !==bookId);
    })
      
    },

    addNewBook(title,description){
      const addBook ={
        id: new Date().toISOString(),
        title: title,
        description: description,
      };
      axios.post(API_URL + "/books", addBook).then((response) => {
      
      this.books.push(response.data.book);
    })
    }
  },

  // include front with back 
  mounted(){
    axios.get(API_URL + "/books").then((response) => {
      this.books = response.data;
    })
  }

};
</script>

<style>
:root {
  --main-color: #3a2dfc;
}

* {
  box-sizing: border-box;
}

html {
  font-family: sans-serif;
}

body {
  margin: 0;
}


header {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  margin: 3rem auto;
  border-radius: 10px;
  padding: 1rem;
  background-color: var(--main-color);
  color: white;
  text-align: center;
  width: 90%;
  max-width: 40rem;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

button {
  cursor: pointer;
  border: 1px solid var(--main-color);
  background-color: var(--main-color);
  color: white;
  padding: 0.5rem 1rem;
  box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.26);
}

button:hover,
button:active {
  box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.26);
}
</style>