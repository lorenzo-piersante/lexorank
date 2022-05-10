# Piersante\Lexorank
String generator for lexicographical ordering in PHP.

## About LexoRank
**LexoRank** is a ranking system introduced by Atlassian JIRA.

This ranking system allows you to reorder items in a collection with **O(1)** complexity.

In fact using strings as position identifiers you only need to generate a new position for the reordered item without
any need to change other items position.

## Resources
- https://medium.com/whisperarts/lexorank-what-are-they-and-how-to-use-them-for-efficient-list-sorting-a48fc4e7849f
- https://www.youtube.com/watch?v=OjQv9xMoFbg

### Disclaimer
This composer package takes a lot of inspiration from alexcrawford/lexorank-php (and on xissy/lexorank consequently).
