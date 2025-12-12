/***********************************************************
 * A small "Task Manager" program using classes,
 * async/await, array methods, and error handling.
 *
 * Contains several intentional bugs for debugging practice.
 ***********************************************************/

// ---------- "Module" Section ----------

// A class representing a task
class Task {
    constructor(id, description, completed = false) {
        this.id = id;
        this.description = description;
        this.completed = completed;
    }

    markDone() {
        this.completed = true;
    }
}

// A fake asynchronous fetch function
function fetchTasksFromServer() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // Simulated server data
            resolve([
                new Task(1, "Write report"),
                new Task(2, "Read textbook"),
                new Task(3, "Fix bug in JS project")
            ]);
        }, 500);
    });
}

// ---------- Main Program Section ----------

async function main() {
    console.log("Fetching tasks...");

    let tasks;
    try {
        tasks = await fetchTaskFromServer();  
    } catch (err) {
        console.error("Error fetching tasks:", err);
        return;
    }

    // Display tasks
    console.log("\nYour Tasks:");
    tasks.forEach(task => {
        console.log(`- (${task.completed ? "X" : " "}) ${task.description}`);
    });

    // Mark a task as done
    console.log("\nMarking task 2 as completed...");
    const taskToComplete = tasks.find(t => t.id === "2");

    if (!taskToComplete) {
        console.error("Could not find task to complete!");
    } else {
        taskToComplete.markDone();
    }

    // Print updated tasks
    console.log("\nUpdated Tasks:");
    tasks.forEach(task => {
        console.log(`- (${task.completed ? "X" : " "}) ${task.description}`);
    });

    console.log("\nExtracting descriptions...");
    const descriptions = tasks.map(task => task.descriptions); 

    if(descriptions[0] === undefined) {
        console.error("Failed to extract task descriptions!");
    }

    console.log(descriptions);
}

main();
