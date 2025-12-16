import Alpine from 'alpinejs'
import { countdownTimer } from './countdown.js'
import './photo-upload';


window.Alpine = Alpine;
window.countdownTimer = countdownTimer;

Alpine.start()
