//Dylan Moyer
//Game Lobby
//Simulates a game lobby where players wait

#include <iostream>
#include <string>

using namespace std;

class Player
{
public:  
    Player(const string& name = "");
    string GetName() const;
    Player* GetNext() const;
    void SetNext(Player* next);
    
private:
    string m_Name;
    Player* m_pNext;  //Pointer to next player in list
};

Player::Player(const string& name): 
    m_Name(name), 
    m_pNext(0) 
{}

string Player::GetName() const
{
    return m_Name;
}

Player* Player::GetNext() const
{
    return m_pNext;
}

void Player::SetNext(Player* next)
{
    m_pNext = next;
}

class Lobby
{
    friend ostream& operator<<(ostream& os, const Lobby& aLobby);
    
public:
    Lobby();
    ~Lobby();
    void AddPlayer();
	void SearchPlayer(); //Search Player Function
    void RemovePlayer();
    void Clear();
    
private:
    Player* m_pHead;  
};

Lobby::Lobby():
    m_pHead(0)
{}

Lobby::~Lobby()
{
    Clear();
}

void Lobby::AddPlayer()
{
	//create a new player node
	cout << "Please enter the name of the new player: ";
	string name;
	cin >> name;

	Player* pNewPlayer = new Player(name);

	//if list is empty, make head of list this new player
	if (m_pHead == 0)
	{
		m_pHead = pNewPlayer;
	}

	else
	{
		// adding at m_phead
		if (pNewPlayer->GetName() < m_pHead->GetName()) // if new player name is less than m_pHead name
		{
			pNewPlayer->SetNext(m_pHead); //move m_pHead next to new player name
			m_pHead = pNewPlayer; //point m_pHead to new player name
		}

		Player* pIter = m_pHead; //points the samething m_pHead points to
		Player* pIter2 = pIter->GetNext(); //points to pIter Get next name

		while (pIter2 && pNewPlayer->GetName() > pIter2->GetName()) //while pIter2 and pNewPlayer name Greater than pIter2 name
		{
			pIter = pIter2;
			pIter2 = pIter2->GetNext();
		}

		pIter->SetNext(pNewPlayer);
		pNewPlayer->SetNext(pIter2);
	}
}

void Lobby::SearchPlayer()
{
	//Enter name to search
	string name;
	int position = 1;
	bool found = false; //flag
	Player* pTemp = m_pHead; //points the samething m_pHead points to

	if (m_pHead == 0)
	{
		cout << "The Game Lobby is empty";
	}
	else
	{

		cout << "Please enter Player name in the lobby to Search: ";
		cin >> name;

			while (pTemp != 0)
			{
				if (pTemp->GetName() == name)
				{
					found = true;
					break;
				}

				pTemp = pTemp->GetNext(); //Same as ++iter
				++position;
			}

			if (found)
			{
				cout << "\nFound: " << name << " in the Game Lobby. In Position " << position << "." <<endl;
			}
			else
			{
				cout << name << " could not be found in the Game Lobby." << endl;
			}
	}
}

void Lobby::RemovePlayer() //mod this to delete any from list
{
	//Enter name to search
	string name;
	Player* pTemp = m_pHead; //points the samething m_pHead points to
	Player* pTemp2 = m_pHead; //points the samething m_pHead points to
	bool found = false; //flag



	if (m_pHead == 0)
	{
		cout << "The Game Lobby is empty";
	}
	else
	{
		cout << "Please enter the player you wish to remove: ";
		cin >> name;

			while (pTemp != 0)
			{
				if (pTemp->GetName() == name)
				{
					if (pTemp == m_pHead)
					{
						m_pHead = m_pHead->GetNext();
						delete pTemp; // Deletes the pTemp pointer
						pTemp = m_pHead; // setting it back to m_pHead
						pTemp2 = m_pHead; // setting it back to m_pHead
						found = true;
					}
					else
					{
						while (pTemp2->GetNext() != pTemp) // Checking to see if pTemp2 is behind pTemp
						{
							pTemp2 = pTemp2->GetNext();
						}
						pTemp2->SetNext(pTemp->GetNext()); // Swaps pointer to get next in the link list
						delete pTemp; // Deletes the pTemp pointer
						pTemp = pTemp2->GetNext(); // Same as ++iter
						found = true;
					}
				}
				else
				{
					pTemp = pTemp->GetNext(); //Same as ++iter
				}
			}
			if (found)
			{
				cout << "\nRemoved: " << name << " from the Game Lobby." << endl;
			}
			else
			{
				cout << "\n" << name << " could not be found in the Game Lobby." << endl;
			}

	}
}

void Lobby::Clear()
{
	while(m_pHead != 0)
	{ 
		if (m_pHead == 0)
		{
			cout << "The game lobby is empty.  No one to remove!\n";
		}
		else
		{
			Player* pTemp = m_pHead;
			m_pHead = m_pHead->GetNext();
			delete pTemp;
		}
	}
}

ostream& operator<<(ostream& os, const Lobby& aLobby)
{
    Player* pIter = aLobby.m_pHead;

    os << "\nHere's who's in the game lobby:\n";
    if (pIter == 0)
    {
        os << "The lobby is empty.\n";
    }
    else
    {
        while (pIter != 0)
        {   
            os << pIter->GetName() << endl;
	        pIter = pIter->GetNext();
        }
    }

    return os;
}

int main()
{
    Lobby myLobby;
    int choice;
    
    do
	{
	    cout << myLobby;
        cout << "\nGAME LOBBY\n";
        cout << "0 - Exit the program.\n";
        cout << "1 - Add a player to the lobby.\n";
		cout << "2 - Search for a player in the lobby.\n";
        cout << "3 - Remove a player from the lobby.\n";
        cout << "4 - Clear the lobby.\n";
        cout << endl << "Enter choice: ";
        cin >> choice;

        switch (choice)
        {
            case 0: cout << "Good-bye.\n"; break;
	        case 1: myLobby.AddPlayer(); break;  
			case 2: myLobby.SearchPlayer(); break; //Search Function added
            case 3: myLobby.RemovePlayer(); break; //mod this to delete a specific player
            case 4: myLobby.Clear(); break;
            default: cout << "That was not a valid choice.\n";
        }
	}
    while (choice != 0);

	system("pause");
    return 0;
}
