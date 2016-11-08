/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>
#include<stdio.h>

#include "helpers.h"
int flag=0;

int bs(int value, int a[],int low, int high)
{
    
    int mid = (low+high)/2;
    
    
    if(low<=high)
    {
        
        if (value == a[mid])
        {
            
            flag = 1;
            
        }
        
        else if (value>a[mid])
        {
            bs(value, a, mid+1, high);
            
        }
        else if (value<a[mid])
        {
            bs(value, a, 0, mid-1);
        }
    }
    else
    {
        
        flag = 0;
    }
    return flag;
}

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    return bs(value, values, 0, n);
}

/**
 * Sorts array of n values.
 */
void sort(int a[], int n)
{
   for(int i=0;i<n;i++)
    {
        for(int j=0;j<n-i-1;j++)
        {
            if(a[j]>a[j+1])
            {
                a[j]=a[j]+a[j+1];
                a[j+1] = a[j]-a[j+1];
                a[j] = a[j]-a[j+1];
                
            }
        }
    }
    for(int i=0;i<n;i++)
      printf("%d ", a[i]);
    
    return;
}