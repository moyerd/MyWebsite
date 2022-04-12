#include <iostream>
#include <string>
#include <ctime>
#include <vector>
#include <algorithm>
#include <cctype>

using namespace std;

void prompt();
char getguess(char & a);
void yesorno(const string & a, char & b, string & c, int & d);

int main()
{
	// setup
	const int MAX_WRONG = 8; // maximum number of incorrect guesses allowed
	vector<string> words; // collection of possible words to guess
	words.push_back("GUESS");
	words.push_back("HANGMAN");
	words.push_back("DIFFICULT");

	srand(time(0));
	random_shuffle(words.begin(), words.end());
	const string THE_WORD = words[0];           // word to guess
	int wrong = 0;                                  // number of incorrect guesses
	string sofar(THE_WORD.size(), '-');         // words guessed so far
	string used = "";                           // letters already guessed

	cout << "Welcome to Hangman. Good luck!\n";

	// main loop
	while ((wrong < MAX_WRONG) && (sofar != THE_WORD))
	{
		cout << "\n\nYou have " << (MAX_WRONG - wrong) << " incorrect guesses left.\n";
		cout << "\nYou've used the following letters:\n" << used << endl;
		cout << "\nSo far the word is:\n" << sofar << endl;
		char guess;

		prompt();
		getguess(guess);
		guess = toupper(guess);
		while (used.find(guess) != string::npos)
		{
			cout << "You have already guessed " << guess << endl;
			prompt();
			getguess(guess);
			guess = toupper(guess);
		}

		used += guess;

		yesorno(THE_WORD, guess, sofar, wrong);
	}

	// shut down
	if (wrong == MAX_WRONG)
		cout << "\nYou have been hanged!";
	else
		cout << "\nYou guessed it!";

	cout << "The word was " << THE_WORD << endl;

	system("pause");
	return 0;
}

void prompt()
{
	cout << "Enter your guess: ";
}
void yesorno(const string & a, char & b, string & c, int & d)
{
	if (a.find(b) != string::npos)
	{
		cout << "That't right " << b << " is in the word.\n";

		for (int i = 0; i < a.length(); ++i)
			if (a[i] == b)
				c[i] = b;

	}
	else
	{
		cout << "Sorry " << b << " isn't in the word.\n";
		++d;
	}

}
char getguess(char & a)
{
	cin >> a;
	return a;
}