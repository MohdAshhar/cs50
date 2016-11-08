#include<stdio.h>
#include<cs50.h>
#include<string.h>
#include<ctype.h>

int main(void)
{
    string name =GetString();
    int flag = 1;
    
    for(int i =0, n = strlen(name); i<n ; i++)
    {
        int lower  = name[i];
        
        if(flag==1)
        {
            name[i] = (char)toupper(lower);
            flag =0;
            printf("%c", name[i]);
        }
        
        if(name[i]==' ')
        {
            flag =1;
            
        }
        
        
    }
    
   printf("\n");
    
    
}