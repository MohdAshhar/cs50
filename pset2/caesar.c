#include<stdio.h>
#include<cs50.h>
#include<string.h>
#include<ctype.h>

int main(int argc, string argv[])
{
    if(argc==2)
    {
        int key = atoi(argv[1]);
        key = key%26;
        
       // printf("plaintext: ");
        string text = GetString();
        string cipher= text;
  
        for (int i = 0, n = strlen(text); i < n; i++)
        {
            
            int ascii_value = text[i];
            int sum = ascii_value+key;
    
            if(ascii_value>64&&ascii_value<91)
            {
                if(sum>90)
                {
                    ascii_value = sum-90;
                    cipher[i] = 64+ascii_value;
                    
                }
                else
                cipher[i] = sum;
            }
            
            else if(ascii_value>96&&ascii_value<123)
            {
                
                if(sum>122)
                {
                    ascii_value = sum-122;
                    cipher[i] = 96+ascii_value;
                }
                else
                cipher[i] = sum;
            }
            
            else
            cipher[i]= ascii_value;
        }
        
        printf("%s\n", cipher);
        return 0;
    
    }
    else
    {
        
        printf("ENTER KEY IN COMMAND LINE\n");
        return 1; 
    }
}