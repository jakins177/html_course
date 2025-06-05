// Progress Tracking System

function loadProgress() {
  const progress = localStorage.getItem('userProgress');
  return progress ? JSON.parse(progress) : { completedLessons: [], quizScores: {} };
}

function saveProgress(progress) {
  localStorage.setItem('userProgress', JSON.stringify(progress));
}

function initializeProgress() {
  let userProgress = loadProgress();
  // Ensure all expected arrays and objects are present
  if (!userProgress.completedLessons) userProgress.completedLessons = [];
  if (!userProgress.quizScores) userProgress.quizScores = {};
  saveProgress(userProgress);
  updateLessonListIndicators();
  updateOverallProgressIndicator(); // Assuming this function will be added or is part of overall UI updates
}

function resetProgress() {
  if (confirm("Are you sure you want to reset all your progress? This action cannot be undone.")) {
    localStorage.removeItem('userProgress');
    initializeProgress(); // Re-initialize to set up fresh progress state
    // Potentially reload or update UI elements to reflect the reset
    window.location.reload(); // Simple way to refresh UI
  }
}

function updateLessonListIndicators() {
  const userProgress = loadProgress();
  document.querySelectorAll('.lesson-item').forEach(item => {
    const lessonId = item.dataset.lessonId;
    if (userProgress.completedLessons.includes(lessonId)) {
      item.classList.add('completed');
      const statusSpan = item.querySelector('.lesson-status');
      if (statusSpan) {
        statusSpan.textContent = 'Completed';
      }
    } else {
      item.classList.remove('completed');
      const statusSpan = item.querySelector('.lesson-status');
      if (statusSpan) {
        statusSpan.textContent = 'Not Started';
      }
    }
  });
}

function markLessonCompleted(lessonId) {
  const userProgress = loadProgress();
  if (!userProgress.completedLessons.includes(lessonId)) {
    userProgress.completedLessons.push(lessonId);
    saveProgress(userProgress);
    updateLessonListIndicators();
    updateOverallProgressIndicator(); // Assuming this function will be added
    // Maybe trigger a celebratory animation or message
  }
}

function updateQuizScore(quizId, score, maxScore) {
  const userProgress = loadProgress();
  userProgress.quizScores[quizId] = { score: score, maxScore: maxScore };
  saveProgress(userProgress);
  // Update UI for quiz score display if it exists on the current page
  // For example, update text content of an element showing this quiz's score
  const scoreDisplay = document.getElementById(`quiz-score-${quizId}`);
  if (scoreDisplay) {
    scoreDisplay.textContent = `Score: ${score}/${maxScore}`;
  }
  updateOverallProgressIndicator(); // Recalculate overall progress
}

// Placeholder for a function that updates a general progress bar or percentage
function updateOverallProgressIndicator() {
  const userProgress = loadProgress();
  const totalLessons = 10; // Example: if you have 10 lessons in total
  const completedLessonsCount = userProgress.completedLessons.length;

  // Example: Calculate progress based on completed lessons
  // You might want a more sophisticated calculation if quizzes also count
  const progressPercentage = (completedLessonsCount / totalLessons) * 100;

  const progressBar = document.getElementById('overall-progress-bar');
  const progressText = document.getElementById('overall-progress-text');

  if (progressBar) {
    progressBar.style.width = progressPercentage + '%';
  }
  if (progressText) {
    progressText.textContent = `Overall Progress: ${Math.round(progressPercentage)}%`;
  }
  console.log(`Overall progress: ${progressPercentage}%`);
}


// Project Modal Functions
function openProjectModal(projectId) {
  var modal = document.getElementById('projectModal-' + projectId);
  if (modal) {
    modal.style.display = 'block';
  }
}

function closeModal(projectId) {
  var modal = document.getElementById('projectModal-' + projectId);
  if (modal) {
    modal.style.display = 'none';
  }
}

// Close modal if user clicks outside of it
window.onclick = function(event) {
  document.querySelectorAll('.modal').forEach(function(modal) {
    if (event.target == modal) {
      // Extract projectId from modal.id = "projectModal-projectId"
      const projectId = modal.id.substring("projectModal-".length);
      closeModal(projectId);
    }
  });
}

// Initialize progress on page load
// Ensure this runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
  initializeProgress();
});
