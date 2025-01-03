<?php

class User {
    private $name;
    private $age;
    private $weight;
    private $height;
    private $fitnessGoals;
    private $medicalHistory;

    public function __construct($name, $age, $weight, $height, $fitnessGoals, $medicalHistory) {
        $this->name = $name;
        $this->age = $age;
        $this->weight = $weight;
        $this->height = $height;
        $this->fitnessGoals = $fitnessGoals;
        $this->medicalHistory = $medicalHistory;
    }

    public function getDetails() {
        return [
            'Name' => $this->name,
            'Age' => $this->age,
            'Weight' => $this->weight,
            'Height' => $this->height,
            'Fitness Goals' => $this->fitnessGoals,
            'Medical History' => $this->medicalHistory,
        ];
    }

    public function updateWeight($newWeight) {
        $this->weight = $newWeight;
        echo "Weight updated to: {$newWeight} kg\n";
    }
}

class Activity {
    private $steps;
    private $caloriesBurned;

    public function __construct() {
        $this->steps = 0;
        $this->caloriesBurned = 0;
    }

    public function trackSteps($steps) {
        $this->steps += $steps;
        echo "Steps added: {$steps}. Total steps: {$this->steps}\n";
    }

    public function trackCalories($calories) {
        $this->caloriesBurned += $calories;
        echo "Calories burned added: {$calories}. Total calories burned: {$this->caloriesBurned}\n";
    }
}

class WorkoutPlan {
    private $plans = [
        'weight_loss' => ['Cardio', 'Yoga'],
        'muscle_gain' => ['Strength Training', 'Bodybuilding'],
        'endurance' => ['Cycling', 'Running'],
    ];

    public function generatePlan($goal) {
        if (isset($this->plans[$goal])) {
            echo "Workout Plan for {$goal}: " . implode(", ", $this->plans[$goal]) . "\n";
        } else {
            echo "No workout plans available for the given goal.\n";
        }
    }
}

class DietManager {
    public function suggestMealPlan($goal) {
        switch ($goal) {
            case 'weight_loss':
                echo "Suggested Diet: High Protein, Low Carbs, Vegetables, Fruits.\n";
                break;
            case 'muscle_gain':
                echo "Suggested Diet: High Protein, Complex Carbs, Healthy Fats.\n";
                break;
            case 'endurance':
                echo "Suggested Diet: Balanced Carbs and Proteins, Hydration.\n";
                break;
            default:
                echo "No diet plans available for the given goal.\n";
        }
    }
}

class Notification {
    public function sendReminder($message) {
        echo "Reminder: {$message}\n";
    }
}

$user = new User("Saiful Islam Shuvo", 29, 85, 180, "weight_loss", "No medical issues");
$activity = new Activity();
$workoutPlan = new WorkoutPlan();
$dietManager = new DietManager();
$notification = new Notification();

echo "<pre>";
echo " User Details \n";
print_r($user->getDetails());

echo "\n Activity Tracking \n";
$activity->trackSteps(5000);
$activity->trackCalories(300);

echo "\n Workout Plan \n";
$workoutPlan->generatePlan("weight_loss");

echo "\n Diet Management \n";
$dietManager->suggestMealPlan("weight_loss");

echo "\n Notifications \n";
$notification->sendReminder("Time for your workout!");
$notification->sendReminder("Don't forget your meals!");

echo "\n Updating Weight \n";
$user->updateWeight(83);
