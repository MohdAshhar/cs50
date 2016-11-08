#include<stdio.h>
#include<cs50.h>
#include<string.h>
#include<ctype.h>

int main(int argc, string argv[])
{
    if(argc==2)
    {
        string keyword = argv[1];
        int key_len = strlen(keyword);
        int flag =1,k=0;
    
        while(k<key_len)
        {
            if(!isalpha(keyword[k]))
             flag = 0;
            k++;
        }
       
    
         if(flag!=0)
        {        
        
            string text = GetString();
            string ciper = text;
        
            for(int i = 0, n = key_len;i<n;i++ )
            {
                keyword[i] = toupper(keyword[i])-65; 
            }
        
        
        
            for(int i  = 0, j = 0, m=0; i<strlen(text); i++)
            {
                j = m%key_len;
                if(isupper(text[i]))
                {
                   
                    ciper[i] = (text[i]-64 + keyword[j])%26;
                    ciper[i] = ciper[i]+64;
                    m++;
                }
            
                else if (islower(text[i]))
                {
                    
                    ciper[i] = (text[i]-96 + keyword[j])%26;
                    ciper[i] = ciper[i]+96;
                    m++;
                }
            
                else
                ciper[i] = text[i];
            
            
            
            }
            
            printf("%s\n", ciper);
            return 0;
        }
        else
        {
            printf("ENTER KEY IN COMMAND LINE\n");
            return 1; 
        }
        
        
    }
    
    else
    {
        printf("ENTER KEY IN COMMAND LINE\n");
        return 1; 
    }
    
}