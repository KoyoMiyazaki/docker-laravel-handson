// import React from 'react';
// import ReactDOM from 'react-dom';

// class TimerLengthControl extends React.Component {
//     render() {
//         return (
//             <div id="timer-length-control" className="timer-length d-flex flex-row">
//                 <div id="break-label">
//                     <div className="label-title">Break Length</div>
//                     <div className="label-timer">
//                         <button id="break-decrement" onClick={this.props.decreaseBreakLength}>
//                             <i className="fas fa-arrow-down"></i>
//                         </button>
//                         <span id="break-length">{this.props.breakLength}</span>
//                         <button id="break-increment" onClick={this.props.increaseBreakLength}>
//                             <i className="fas fa-arrow-up"></i>
//                         </button>
//                     </div>
//                 </div>
//                 <div id="session-label">
//                     <div className="label-title">Session Length</div>
//                     <div className="label-timer">
//                         <button id="session-decrement" onClick={this.props.decreaseSessionLength}>
//                             <i className="fas fa-arrow-down"></i>
//                         </button>
//                         <span id="session-length">{this.props.sessionLength}</span>
//                         <button id="session-increment" onClick={this.props.increaseSessionLength}>
//                             <i className="fas fa-arrow-up"></i>
//                         </button>
//                     </div>
//                 </div>
//             </div>
//         );
//     }
// }

// class TimerApp extends React.Component {
//     constructor(props) {
//         super(props);
//         this.state = {
//             breakLength: 5,
//             sessionLength: 25,
//             timerLength: 25 * 60,
//             isSessionTime: true,
//             isRunning: false,
//             isResetState: true,
//             timerType: "Session",
//             passageId: "",
//         }
//         this.increaseBreakLength = this.increaseBreakLength.bind(this);
//         this.decreaseBreakLength = this.decreaseBreakLength.bind(this);
//         this.increaseSessionLength = this.increaseSessionLength.bind(this);
//         this.decreaseSessionLength = this.decreaseSessionLength.bind(this);
//         this.showTimer = this.showTimer.bind(this);
//         this.startTimer = this.startTimer.bind(this);
//         this.stopTimer = this.stopTimer.bind(this);
//         this.reset = this.reset.bind(this);
//         this.calcTime = this.calcTime.bind(this);
//     }

//     increaseBreakLength() {
//         if (this.state.breakLength + 1 <= 60) {
//             this.setState({
//                 breakLength: this.state.breakLength + 1,
//             });
//         }
//     }

//     decreaseBreakLength() {
//         if (this.state.breakLength - 1 >= 1) {
//             this.setState({
//                 breakLength: this.state.breakLength - 1,
//             });
//         }
//     }

//     increaseSessionLength() {
//         if (this.state.sessionLength + 1 <= 60) {
//             this.setState({
//                 sessionLength: this.state.sessionLength + 1,
//                 timerLength: this.state.timerLength + 60,
//             });
//         }
//     }

//     decreaseSessionLength() {
//         if (this.state.sessionLength - 1 >= 1) {
//             this.setState({
//                 sessionLength: this.state.sessionLength - 1,
//                 timerLength: this.state.timerLength - 60,
//             });
//         }
//     }

//     showTimer() {
//         if (this.state.timerLength === 0) {
//             document.getElementById("beep").play();
//             this.state.isSessionTime ?
//               this.setState({
//                 timerLength: this.state.breakLength * 60,
//                 isSessionTime: !this.state.isSessionTime,
//                 timerType: "Break",
//               }) : 
//               this.setState({
//                 timerLength: this.state.sessionLength * 60,
//                 isSessionTime: !this.state.isSessionTime,
//                 timerType: "Session",
//               });
//         } else if (this.state.timerLength - 1 >= 0) {
//             this.setState({
//                 timerLength: this.state.timerLength - 1,
//             });
//         }
//     }
    
//     startTimer() {
//         if (this.state.isResetState) {
//             if (this.state.isSessionTime) { // session time
//                 this.setState({
//                     timerLength: this.state.sessionLength * 60,
//                 });
//             } else { // break time
//                 this.setState({
//                     timerLength: this.state.breakLength * 60,
//                 });
//             }
//         }

//         this.setState({
//             isRunning: true,
//             isResetState: false,
//             passageId: setInterval(this.showTimer, 1000),
//         });
//     }
    
//     stopTimer() {
//         this.setState({
//             isRunning: false,
//             passageId: clearInterval(this.state.passageId),
//         });
//     }

//     reset() {
//         this.setState({
//             breakLength: 5,
//             sessionLength: 25,
//             timerLength: 25 * 60,
//             isSessionTime: true,
//             isRunning: false,
//             isResetState: true,
//             timerType: "Session",
//             passageId: clearInterval(this.state.passageId),
//         });
//         let beep = document.getElementById("beep");
//         beep.pause();
//         beep.currentTime = 0;
//     }

//     calcTime() {
//         let minutes = Math.floor(this.state.timerLength / 60);
//         let seconds = this.state.timerLength % 60;
//         minutes = minutes < 10 ? `0${minutes}` : minutes;
//         seconds = seconds < 10 ? `0${seconds}` : seconds;
//         return `${minutes}:${seconds}`;
//     }

//     render() {
//         return (
//             <div className="container">
//                 <h1 id="clock-title">25 + 5 Clock</h1>
//                 <TimerLengthControl 
//                   breakLength={this.state.breakLength}
//                   sessionLength={this.state.sessionLength}
//                   increaseBreakLength={this.increaseBreakLength}
//                   decreaseBreakLength={this.decreaseBreakLength}
//                   increaseSessionLength={this.increaseSessionLength}
//                   decreaseSessionLength={this.decreaseSessionLength}
//                 />
//                 <div className="timer-wrapper">
//                     <div id="timer-label">{this.state.timerType}</div>
//                     <div id="time-left">{this.calcTime()}</div>
//                 </div>
//                 <div className="timer-control">
//                     <button id="start_stop" onClick={this.state.isRunning ? this.stopTimer : this.startTimer}>
//                         <i className="fas fa-play"></i>
//                         <i className="fas fa-pause"></i>
//                     </button>
//                     <button id="reset" onClick={this.reset}>
//                         <i className="fas fa-sync-alt"></i>
//                     </button>
//                 </div>
//                 <div className="timer-beep">
//                     <audio 
//                       id="beep"
//                       preload="auto"
//                       src="https://raw.githubusercontent.com/freeCodeCamp/cdn/master/build/testable-projects-fcc/audio/BeepSound.wav"
//                     />
//                 </div>
//             </div>
//         );
//     }
// }

// const target = document.querySelector('#app');
// ReactDOM.render(<TimerApp />, target);

console.log('hello react');