using UnityEngine;
using System.Collections;
using environment;
using System;
using System.IO;
using System.Runtime.CompilerServices; 
using myAss;
public class GameControl : MonoBehaviour {

	// Use this for initialization
	private Data.BlockType[,] Puzzle0 = new Data.BlockType[Data.BlockWidth+2, Data.BlockHeight+2];
	private GameObject[] Objs = new GameObject[20];
	private string[] ObjsTag = new string[6]{"Wall0", "Wall", "Piz00", "Piz01", "Piz10", "Piz11"};
	
	void Start () {
		for(int lx = 0;lx < 6;lx++)
			Objs[lx] = GameObject.FindWithTag(ObjsTag[lx]);
		InitPuzzle0();
		ShowPuzzle0();	
	}
	
	void InitPuzzle0(){
		for(int lx = 0;lx < Data.BlockWidth+2;lx++){
			Puzzle0[lx,0] = Data.BlockType.Wall0;
			Puzzle0[lx, Data.BlockHeight+1] = Data.BlockType.Wall0;
		}
		
		for(int lx = 0;lx < Data.BlockHeight+2;lx++){
			Puzzle0[0, lx] = Data.BlockType.Wall0;
			Puzzle0[Data.BlockWidth+1,lx] = Data.BlockType.Wall0;
		}
		
		for(int lx = 1;lx <= Data.BlockWidth;lx++)
			for(int ly = 1;ly <= Data.BlockHeight;ly++)
				Puzzle0[lx, ly] = Data.BlockType.Empty;
		
		Puzzle0[1, 1] = Data.BlockType.Piz00;
		Puzzle0[1, 2] = Data.BlockType.Piz01;
		Puzzle0[2, 1] = Data.BlockType.Piz10;
		Puzzle0[2, 2] = Data.BlockType.Piz11;
		
	}
	void ShowPuzzle0(){
		for(int lx = 0;lx < Data.BlockWidth+2;lx++){
			for(int ly = 0;ly < Data.BlockHeight+2;ly++){
				if(Puzzle0[lx, ly] == Data.BlockType.Empty) continue;
				int type = (int)Puzzle0[lx, ly];
				Quaternion SpawnRotation = Quaternion.identity;
				Vector3 SpawnPosition = new Vector3(
					Data.Opoint.x + lx*Data.Sidelength, 
					Data.Opoint.y + ly*Data.Sidelength,0);
				Instantiate (Objs[type], SpawnPosition, SpawnRotation);
			}
		}
	}
	
	Vector2 GetInput(){
		// Modify to be real 
		return new Vector2(Input.GetAxis("Horizontal"), Input.GetAxis("Vertical"));
	}
	
	float IfPossitive(float a){
		return (a>0?1:-1);
	}

	Vector2 PlayerMovement (){
		Vector2 read = GetInput();
		int tmp = 0;
		if(Math.Abs(read.x) <= Data.SlantTolerant) tmp|=1;
		if(Math.Abs(read.y) <= Data.SlantTolerant) tmp|=2;
		switch(tmp){
			case 0:
				return new Vector2(0, 0);
			case 1:
				return new Vector2(IfPossitive(read.x), 0);
			case 2:
				return new Vector2(0, IfPossitive(read.y));
			case 3:
				if(Math.Abs(read.x) > Math.Abs(read.y))
					return new Vector2(IfPossitive(read.x), 0);
				else
					return new Vector2(0, IfPossitive(read.y));
			default:
				print ("[ERROR]PlayerMovement Error.Switch case exception.");
				return new Vector2(0, 0);
		}
	}	

	void FixedUpdate(){
		
	}

	// Update is called once per frame
	void Update () {
		
	}
}