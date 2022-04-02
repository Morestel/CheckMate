require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import { ChessBoard } from './components/ChessBoard.js';

createApp({
    components: {
        'chessboard': ChessBoard
    }
}).mount('#app');
