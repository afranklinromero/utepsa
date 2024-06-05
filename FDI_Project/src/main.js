// src/main.js
import { createApp } from 'petite-vue';
import { auth, db } from './firebase-config';
import { signInWithEmailAndPassword, createUserWithEmailAndPassword, signOut } from 'firebase/auth';
import { collection, addDoc, getDocs } from 'firebase/firestore';

