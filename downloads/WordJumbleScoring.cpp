#include <iostream>
#include <string>
#include <cstdlib>
#include <ctime>

using namespace std;

int main()
{
	enum fields { WORD, HINT, NUM_FIELDS };
	const int NUM_WORDS = 5;
	int score = 0;
	const string WORDS[NUM_WORDS][NUM_FIELDS] =
	{
		{ "wall", "Do you feel you're banging your head against something?" },
		{ "glasses", "These might help you see the answer." },
		{ "labored", "Going slowly, is it?" },
		{ "persistent", "Keep at it." },
		{ "jumble", "It's what the game is all about." }
	};
	enum difficulty { EASY, MEDIUM, HARD, NUM_DIFF_LEVELS };
	cout << "There are " << NUM_DIFF_LEVELS << " difficulty levels.";
	srand(static_cast<unsigned int>(time(0)));
	int choice = (rand() % NUM_WORDS);
	string theWord = WORDS[choice][WORD]; //word to guess
	string theHint = WORDS[choice][HINT]; //hint for word

	string jumble = theWord; //jumble version of word
	int length = jumble.size();
	for (int i = 0; i < length; ++i)
	{
		int index1 = (rand() % length);
		int index2 = (rand() % length);
		char temp = jumble[index1];
		jumble[index1] = jumble[index2];
		jumble[index2] = temp;
		score += 1000;  //add 100 points for every letter in the word.
	}
	cout << "\t\t\tWelcome to Word Jumble!\n\n";
	cout << "In this Word Jumble there will be a scoring system.\n";
	cout << "You earn more points longer the word.\n";
	cout << "When asking for a hint will deduct points.\n";
	cout << "Unscramble the letters to make a word.\n";
	cout << "Enter 'hint' for a hint.\n";
	cout << "Enter 'quit' to quit the game.\n\n";
	cout << "The jumble is: " << jumble;

	string guess;
	cout << "\n\nYour guess: ";
	cin >> guess;

	while ((guess != theWord) && (guess != "quit"))
	{
		if (guess == "hint")
		{
			cout << theHint;
			score -= 1000; //deducts points for hint
		}
		else
		{
			cout << "Sorry, that's not it.";
		}
		cout << "\n\nYour guess: ";
		cin >> guess;
	}
	if (guess == theWord)
	{
		cout << "\nThat's it! You guessed it! Your score is: \n" << score << "\n";
	}
	cout << "\nThanks for playing.\n";

	system("pause");
	return 0;
}